<div id="sample" class="modal-content">
		<h1>nyroModal</h1>
		<p>Ajax Call, Ajax Call with targeting content, Single Image, Images Gallery with arrow navigating, Gallery with any kind of content, Form, Form in iframe, Form with targeting content, Form with file upload, Form with file upload with targeting content, Dom Element, Manual Call, Iframe, Stacked Modals, Many embed element through Embed.ly API, Error handling, Modal will never goes outside the view port, Esc key to close the window, Customizable animation, Customizable look, Modal title.</p>
		<a href="http://nyromodal.nyrodev.com/" class="outside">http://nyromodal.nyrodev.com</a>
</div>
<!-- Email d'inscription à un nouvel membre -->
<div class="modal-content" id="emailuser">
	<h1 style="color:#AE432E;">Envoyer un email d'inscription </h1>
	<?php echo form_open('projet/mailInvitation',array('class'=>'vertical-form')); ?>
		<fieldset>
			<legend>Adhérer un nouveau membres</legend>
			<dl>
				<dt class="clear-tm">
					<label class="mandatory">Email:</label>
				</dt>
				<dd>
					<input type="text" name="email" id="email" class="medium" value="<?php echo $this->input->post('user_email') ?>">
					<?php echo form_error('email','<span class="invalid-side-note">','</span>'); ?>
				<p>l'email de membre</p>
				</dd>

				<dt class="clear-tm">
					<label class="mandatory">Message</label>
				</dt>
				<dd>
					<textarea name="message" id="" cols="40" rows="5"></textarea>
					<?php echo form_error('message','<span class="invalid-side-note">','</span>'); ?>
					<p>message de notification </p>
				</dd>
			</dl>
		</fieldset>
		<button type="submit">Envoyer</button>
	<?php echo form_close();; ?>
</div>