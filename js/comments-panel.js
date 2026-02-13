/**
 * Painel deslizante de comentários - Otimizado para performance
 */
(function() {
	'use strict';

	// Remove classe no-js e adiciona js no HTML e BODY
	document.documentElement.classList.replace('no-js', 'js');
	if (document.body.classList.contains('no-js')) {
		document.body.classList.replace('no-js', 'js');
	}

	// Elementos
	let commentsPanel = null;
	let commentsOriginal = null;
	let overlay = null;
	let closeButton = null;

	// Inicialização
	function init() {
		// Pegar o primeiro #comments encontrado
		commentsOriginal = document.getElementById('comments');
		
		if (!commentsOriginal) {
			return;
		}

		// Criar estrutura básica (sem clonar o conteúdo ainda)
		createPanelStructure();

		// Configurar links de comentários
		setupCommentLinks();

		// Verificar se deve abrir automaticamente
		checkAutoOpen();

		// Event listeners
		setupEventListeners();
	}

	// Criar estrutura do painel (sem conteúdo - lazy loading)
	function createPanelStructure() {
		// Criar overlay
		overlay = document.createElement('div');
		overlay.className = 'comments-overlay';
		overlay.setAttribute('aria-hidden', 'true');
		
		// Criar painel
		commentsPanel = document.createElement('aside');
		commentsPanel.className = 'comments-panel';
		commentsPanel.setAttribute('aria-label', 'Painel de comentários');
		commentsPanel.setAttribute('aria-hidden', 'true');
		
		// Criar botão de fechar
		closeButton = document.createElement('button');
		closeButton.className = 'comments-close';
		closeButton.setAttribute('aria-label', 'Fechar comentários');
		closeButton.setAttribute('type', 'button');
		closeButton.innerHTML = '&times;';
		
		// Criar container interno vazio
		const innerContainer = document.createElement('div');
		innerContainer.className = 'comments-panel-inner';
		
		commentsPanel.appendChild(closeButton);
		commentsPanel.appendChild(innerContainer);
		
		// Adicionar ao DOM usando fragment para evitar reflows
		const fragment = document.createDocumentFragment();
		fragment.appendChild(overlay);
		fragment.appendChild(commentsPanel);
		document.body.appendChild(fragment);
	}

	// Clonar conteúdo apenas quando necessário (lazy loading)
	function loadPanelContent() {
		const innerContainer = commentsPanel.querySelector('.comments-panel-inner');
		
		// Verificar se já foi carregado
		if (innerContainer.children.length > 0) {
			return;
		}
		
		// Clonar apenas quando abrir pela primeira vez
		const commentsClone = commentsOriginal.cloneNode(true);
		commentsClone.style.display = 'block';
		innerContainer.appendChild(commentsClone);
	}

	// Configurar links de comentários (event delegation)
	function setupCommentLinks() {
		// Usar event delegation ao invés de adicionar listener em cada link
		document.body.addEventListener('click', function(e) {
			const commentLink = e.target.closest('.comment-link');
			if (commentLink) {
				handleCommentLinkClick(e, commentLink);
			}
		});
	}

	// Handler para clique em link de comentários
	function handleCommentLinkClick(e, link) {
		// Se estamos em uma página de post individual
		if (document.body.matches('.single, .page')) {
			e.preventDefault();
			openPanel();
			
			// Adicionar parâmetro na URL (mantém #comments mesmo que o link original seja #respond)
			if (history.pushState) {
				const url = new URL(window.location);
				url.hash = 'comments';
				history.pushState({commentsOpen: true}, '', url);
			}
		}
	}

	// Verificar se deve abrir automaticamente (quando vem de link externo)
	function checkAutoOpen() {
		const hash = window.location.hash;
		
		// Verificar se é #comments, #respond ou #comment-XXXX
		if (hash === '#comments' || hash === '#respond' || hash.startsWith('#comment-')) {
			// Usar requestAnimationFrame para não bloquear o render inicial
			requestAnimationFrame(function() {
				openPanel();
				
				// Se for um comentário específico, rolar até ele após abrir o painel
				if (hash.startsWith('#comment-')) {
					scrollToComment(hash);
				}
				
				// Normalizar URL para sempre usar #comments (exceto se for comentário específico)
				if (hash === '#respond' && history.replaceState) {
					const url = new URL(window.location);
					url.hash = 'comments';
					history.replaceState({commentsOpen: true}, '', url);
				}
			});
		}
	}

	// Rolar até comentário específico dentro do painel
	function scrollToComment(hash) {
		// Aguardar a animação do painel terminar (600ms) + buffer
		setTimeout(function() {
			const commentId = hash.substring(1); // Remove o #
			const commentElement = commentsPanel.querySelector('#' + commentId);
			
			if (commentElement) {
				// Rolar suavemente até o comentário dentro do painel
				commentElement.scrollIntoView({
					behavior: 'smooth',
					block: 'start'
				});
				
				// Adicionar destaque temporário (opcional)
				commentElement.style.outline = '2px solid #0073aa';
				commentElement.style.outlineOffset = '4px';
				setTimeout(function() {
					commentElement.style.outline = '';
					commentElement.style.outlineOffset = '';
				}, 2000);
			}
		}, 700);
	}

	// Abrir painel
	function openPanel() {
		// Carregar conteúdo sob demanda
		loadPanelContent();
		
		// Usar requestAnimationFrame para melhor performance de animação
		requestAnimationFrame(function() {
			commentsPanel.classList.add('active');
			overlay.classList.add('active');
			
			// Forçar display block via JavaScript (caso algum CSS do tema esteja escondendo)
			commentsPanel.style.display = 'block';
			
			// Acessibilidade
			commentsPanel.setAttribute('aria-hidden', 'false');
			overlay.setAttribute('aria-hidden', 'false');
			
			// Focar no botão de fechar
			closeButton.focus();
		});
	}

	// Fechar painel
	function closePanel() {
		commentsPanel.classList.remove('active');
		overlay.classList.remove('active');
		
		// Acessibilidade
		commentsPanel.setAttribute('aria-hidden', 'true');
		overlay.setAttribute('aria-hidden', 'true');
		
		// Remover hash da URL (mas manter se for comentário específico)
		if (history.pushState) {
			const url = new URL(window.location);
			const hash = url.hash;
			
			// Remover apenas hashes genéricos, manter âncoras de comentários específicos
			if (hash === '#comments' || hash === '#respond') {
				url.hash = '';
				history.pushState({commentsOpen: false}, '', url.pathname + url.search);
			}
		}
	}

	// Configurar event listeners
	function setupEventListeners() {
		// Botão de fechar
		closeButton.addEventListener('click', function(e) {
			e.preventDefault();
			closePanel();
		});
		
// Overlay - fechar ao clicar fora do painel (apenas em telas grandes)
		overlay.addEventListener('click', function(e) {
    // Verificar se o clique foi realmente no overlay e não no painel
			if (e.target === overlay) {
				closePanel();
			}
		});
		
		// Tecla ESC - usar passive listener
		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape' || e.key === 'Esc') {
				if (commentsPanel && commentsPanel.classList.contains('active')) {
					closePanel();
				}
			}
		}, {passive: true});
		
		// Navegação do navegador (botão voltar/avançar)
		window.addEventListener('popstate', function(e) {
			const hash = window.location.hash;
			
			if (hash === '#comments' || hash === '#respond' || hash.startsWith('#comment-')) {
				openPanel();
				
				// Se for comentário específico, rolar até ele
				if (hash.startsWith('#comment-')) {
					scrollToComment(hash);
				}
			} else if (commentsPanel && commentsPanel.classList.contains('active')) {
				closePanel();
			}
		});
	}

	// Inicializar quando o DOM estiver pronto
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();