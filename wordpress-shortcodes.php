<?php
/*


Dorian Torres - Desenvolvedor web
contato@doriantorres.com.br

http://doriantorres.com.br


Fique à vontade para utilizar, compartilhar, distribuir, alterar este código. 
Não é necessário atribuição.

Espero lhe ser útil,

Grande abraço!


==========================================================================================================

OBSERVAÇÃO:

PARA QUE FUNCIONEM CORRETAMENTE,
AS FUNÇÕES E CHAMADAS ABAIXO DEVEM SER ADICIONADAS NO ARQUIVO 'functions.php' do seu tema no Wordpress.

Enjoy!

==========================================================================================================

*/



function funcao_do_shortcode($atts)
{
	return 'Texto fixo que eu quero que seja exibido';
}

add_shortcode( 'shortcode', 'funcao_do_shortcode' );

function shortcode_com_texto($atts)
{
	$array = shortcode_atts(
		array
		( 
			'texto' => 'Texto padrão',
		),
		$atts);

	return $array['texto'];
}


add_shortcode( 'shortcode_texto', 'shortcode_com_texto' );

function shortcode_com_botao($atts)
{
	$array = shortcode_atts(
		array
		( 
			//Texto a ser exibido no botão
			'texto_do_botao' => 'Texto padrão',

			//link (href). Com valor padrão 'javascript:;' para evitar o redirecionamento 
			'link_do_botao' => 'javascript;' 
		),
		$atts
	);

	$href = $array['link_do_botao'];
	$texto = $array['texto_do_botao'];




	//Função auxiliar para retornar conteúdo html
	ob_start();

	?>

	<a href="<?php echo $href ?>"><?php echo $texto ?></a>

	<?php
		
	return ob_get_clean();
}



add_shortcode( 'shortcode_botao', 'shortcode_com_botao' );

function shortcode_conteudo( $atts, $content = null ) {
     return '<p class="conteudo">' . do_shortcode($content) . '</p>';
}
add_shortcode( 'nome_do_shortcode', 'shortcode_conteudo' );

function shortcode_recursivo( $atts, $content = null ) {
     return '<a href="http://google.com.br" class="link">' . $content  . '</a>';
}

function outro_shortcode($atts) {
     return '<a class="link" href=”http://doriantorres.com.br”>Página</a>';
}
add_shortcode( 'shortcode_conteudo', 'shortcode_conteudo' );
add_shortcode( 'outro_shortcode_nome', 'outro_shortcode' );

?>
