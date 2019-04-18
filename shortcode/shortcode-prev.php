<?php
/**
 * Link shortcode
 *
 * Write [prev] in your post editor to render this shortcode.
 *
 * @package	 ABS
 * @since    1.0.0
 */

if ( ! function_exists( 'prev_shortcode' ) ) {
	// Add the action.
	add_action( 'plugins_loaded', function() {
		// Add the shortcode.
		add_shortcode( 'prev', 'prev_shortcode' );
	});

	/**
	 * Shortcode Function
	 *
	 * @param  Attributes $atts l|t URL TEXT.
	 * @return string
	 * @since  1.0.0
	 */
	function prev_shortcode( $atts ) {		
		// Return it, Safe in PHP 7.0.
		$_return = '<div id="form" onchange="calcPrev()">
						<h3>Preencha todos os campos abaixo para calcular quanto tempo falta para sua aposentadoria.</h2>

						<form>
							<p>Qual a sua idade?</p>
							<input id="idade" type="number" min="1" max="120" required="" name="idade">
							<label for="idade">anos</label>

							<p>Qual setor de atuação?</p>	
							<input id="publico" type="radio" value="0" name="setor" required="">Público</input>

							<input id="privado" type="radio" value="1" name="setor" required="">Privado</input>
							

							<p>Selecione seu sexo biológico:</p>
							<input id="m" type="radio" value="0" name="sex" required="">Masculino</input>

							<input id="f" type="radio" value="1" name="sex" required="">Feminino</input>

							<p>Quantos anos de contríbuição?</p>
							<input id="cont" type="number" name="cont" min="1" max="120">
							<label for="cont">anos</label>

							<p>Em quais destas profissões você se enquadra?</p>
							<input id="outro" type="radio" value="0" name="profissao" required="">Outro</input>

							<input id="prof" type="radio" value="1" name="profissao" required="">Professor</input>

							<input id="rural" type="radio" value="2" name="profissao" required="">Trabalhador Rural</input>
							
							<p>Qual sua faixa salarial?</p>
							<input id="salario" type="number" min="954" required="" value="988">

							<button type="button" onclick="calcPrev(),ChangeBackground()">Calcular</button>
						</form>
					</div>

					<hr>

					<div id="results">
						<h3>Resultado:</h3>
						<p>A idade mínima para solicitar aposentadoria para sua categoria é de <strong><span id="idade-minima"></span></strong> anos.</p>

						<p>Você ainda precisa contribuir por mais <strong><span id="anos"></span></strong> anos ou aguardar mais <strong><span id="anos-fim"></span></strong> anos para se aposentar por idade.</p>
						
						<p>O valor aproximado para sua aposentadoria é de <strong>R$ <span id="valor"></span></strong>.</p> 
					</div>';

		// Return the data.
		return $_return;
	}
} // End if().
