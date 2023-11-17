<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Dez
 */

get_header();
?>

	<main id="primary" class="site-main">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h1>Mapa do <strong>Manual do Usuário</strong></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<p>O <strong>Manual do Usuário</strong> é, em essência, um blog. Isso significa que seu conteúdo é apresentado em ordem cronológica inversa, ou seja, o material mais novo aparece primeiro <a href="<?php echo esc_url( home_url() ); ?>">na capa</a> e em outras áreas do site.</p>
				<p>O formato blog tem uma série de vantagens para uma publicação pequena — como é o caso aqui — e uma grande desvantagem: ele “enterra” com muita rapidez um conteúdo que, mesmo não sendo novo, ainda é relevante.</p>
				<p>Uma saída é usar a busca. Experimente:</p>
				<?php get_search_form(); ?>
				<p>Outra é esta página em que você se encontra, um ~mapa do <strong>Manual</strong>, ou uma tentativa de mostrar o que é produzido aqui e que nem sempre aparece na página inicial. Use o índice abaixo para se guiar.</p>
				<h2 id="menu123">Índice</h2>
				<ul>
				<li><a href="#basico">Informações básicas</a></li>
				<li><a href="#newsletter">Newsletter</a></li>
				<li><a href="#assinatura">Assinatura</a></li>
				<li><a href="#especiais">Projetos especiais</a></li>
				<li><a href="#multimidia">Multimídia (podcasts e vídeos)</a></li>
				<li><a href="#arquivo">Arquivo</a></li>
				</ul>
				<h2 id="basico">Informações básicas</h2>
				<p>Se esta é a primeira vez que você visita o <strong>Manual</strong> ou quer saber mais a respeito do projeto, dê uma lida <a href="<?php echo esc_url( home_url( '/sobre' ) ); ?>">na página “Sobre”</a>.</p>
				<p>Os comentários dos posts e do Órbita são bem movimentados aqui. Para entender a dinâmica, ler as regras de convivência e aprender a colocar um “avatar” (foto), leia as <a href="<?php echo esc_url( home_url( '/doc-comentarios' ) ); ?>">dicas e orientações para comentários</a>.</p>
				<p>O <strong>Manual</strong> só tem um “funcionário” em tempo integral — eu, <a href="https://rodrigo.ghed.in/">Rodrigo Ghedin</a>. Sempre que tiver alguma dúvida, sugestão, proposta ou puxão de orelha, envie um e-mail para <a href="mailto:ghedin@manualdousuario.net">ghedin@manualdousuario.net</a>. Respondo o mais rápido que puder.</p>
				<p>Além do site principal, mantenho um “meta blog” chamado <a href="https://bastidores.manualdousuario.net/"><em>Bastidores</em></a>. Ali, comento as mudanças, melhorias e desafios na rotina de fazer o <strong>Manual</strong>.</p>
				<p><a href="#menu123">↑ Voltar ao menu</a></p>
				<h2 id="newsletter">Newsletter</h2>
				<p>O <strong>Manual</strong> tem vários <a href="<?php echo esc_url( home_url( '/acompanhe' ) ); ?>">canais sociais</a>; a newsletter, com edições periódicas às sextas e sábados, é o principal deles.</p>
				<p>Inscreva-se, gratuitamente, colocando seu e-mail no formulário abaixo:</p>
				<form action="https://sendy.voltdata.info/subscribe" method="post" accept-charset="utf-8"><label style="display: none;" for="email">Seu e-mail</label><input id="email" name="email" type="email" placeholder="Digite seu e-mail" style="max-width: 60%; margin-right: .6rem" /><input type="hidden" name="list" value="5hbIBhgttipQeZXjMcG0jA"/><input type="hidden" name="subform" value="yes"/><input type="submit" name="submit" id="submit" value="Vai" />
				</form>
				<p>A newsletter é feita manualmente, com todo o cuidado e carinho possível. Não é, como muitas por aí, um catadão de links. Ela se sustenta sozinha, como um produto independente do site.</p>
				<p><a href="#menu123">↑ Voltar ao menu</a></p>
				<h2 id="assinatura">Assinatura</h2>
				<p>Uma das fontes de receita do <strong>Manual do Usuário</strong> é a assinatura: leitores que podem e queiram contribuir pagam um pequeno valor mensal ou anual em troca de manter o projeto no ar.</p>
				<p>Além disso, assinantes pagantes recebem alguns mimos extras, detalhados <a href="<?php echo esc_url( home_url( '/apoie' ) ); ?>">na página das assinaturas</a>.</p>
				<p><a href="#menu123">↑ Voltar ao menu</a></p>
				<h2 id="especiais">Projetos especiais</h2>
				<p>Vez ou outra surgem oportunidades de desenvolver projetos especiais. Sempre as agarro.</p>
				<p>No momento, o <strong>Manual</strong> mantém ou está envolvido nos seguintes projetos:</p>
				<ul>
				<li><a href="<?php echo esc_url( home_url( '/orbita' ) ); ?>">Órbita</a>, um espaço para conversas e conteúdo gerado pelos leitores dentro do <strong>Manual</strong>.</li>
				<li><a href="<?php echo esc_url( home_url( '/newsletters-brasileiras' ) ); ?>">Diretório de newsletters brasileiras</a>, com mais de 200 newsletters catalogadas e pesquisáveis;</li>
				<li><a href="<?php echo esc_url( home_url( '/lojinha' ) ); ?>">Lojinha</a>, com produtos com a nossa marca feitos em parceria com pequenas e micro empresas legais.</li>
				</ul>
				<p><a href="#menu123">↑ Voltar ao menu</a></p>
				<h2 id="multimidia">Multimídia (podcasts e vídeos)</h2>
				<p>Nem só de texto escrito se vive. Temos dois podcasts:</p>
				<ul>
				<li><a href="<?php echo esc_url( home_url( '/series/guia-pratico' ) ); ?>"><em>Guia Prático</em></a>, semanal, produzido e apresentado por mim; e</li>
				<li><a href="<?php echo esc_url( home_url( '/series/tecnocracia' ) ); ?>"><em>Tecnocracia</em></a>, sem periodicidade definida, produzido e apresentado por Guilherme Felitti.</li>
				</ul>
				<p>No YouTube, publico vídeos esporádicos com dicas de tecnologia e vida digital. Lá, <a href="https://www.youtube.com/c/manualusuariobr">estou no canal <span class="citation" data-cites="mdu">@mdu</span></a>.</p>
				<p><a href="#menu123">↑ Voltar ao menu</a></p>
				<h2 id="arquivo">Arquivo</h2>
				<p>No ar desde 15 de outubro de 2013, o <strong>Manual do Usuário</strong> já publicou milhares de posts. Abaixo, há alguns filtros para te ajudar a encontrar algo ou apenas navegar no nosso histórico.</p>

				<div style="max-width: 40%; float: left; margin-bottom: 2em"><h3>Seções</h3>
				<ul>
					<?php
					wp_list_categories(
						array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 0,
						)
					);
					?>
				</ul>

				<h3>Assuntos populares</h3>
				<?php
				wp_tag_cloud(
					array(
						'smallest' => 12,
						'largest'  => 32,
						'unit'     => 'px',
						'number'   => 0,
						'orderby'  => 'name',
						'order'    => 'ASC',
						'taxonomy' => 'post_tag',
					)
				);
				?>
				</div>

				<div style="text-transform: capitalize; width: 50%; float: right; margin-bottom: 2em">
				<h3>Mensal</h3>
				<ul>
					<?php
					$args = array(
						'type'            => 'monthly',
						'limit'           => '',
						'format'          => 'html',
						'before'          => '',
						'after'           => '',
						'show_post_count' => 1,
						'echo'            => 1,
						'order'           => 'DESC',
						'post_type'       => 'post',
					);
					wp_get_archives( $args );
					?>
				</ul></div>

			</div><!-- .page-content -->

		</article><!-- #post-<?php the_ID(); ?> -->

	</main><!-- #main -->

<?php
get_footer();
