		<form method="POST">
			<p>
				<label>
					<span class='your-url'>Your URL:</span>
					<?php if($errors && isset($error_validation['url'])) : ?>
						<small class="error"><?php echo $error_validation['url']; ?></small>
					<?php endif; ?>
					<input type='text' name='url' value='<?php echo $urls['url']; ?>' placeholder="">	
				</label>
			</p>
			
			<p>
				<label>
					Number of characters (3 to 60)
					<input type='number' name='number_carac' value="<?php echo $urls['number_carac']; ?>" min="3" max="60">	
				</label>
			</p>

			<p>
				<label>
					Optional URL<span>www.pin.esy.es/</span>
					<?php if($errors && isset($error_validation['url_opcional'])) : ?>
						<span class="alert-box alert round"><?php echo $error_validation['url_opcional']; ?></span>
					<?php endif; ?>
					<input type='text' name='url_opcional' value='<?php echo $urls['url_opcional']; ?>'>
				</label>
			</p>

			<label>
				<button type='submit' class='button round success'>Rock it!</button>
			</label>
		</form>

		<?php if (! $errors && isset($new_url)) : ?>
			<div class='new-url'>
				<p>Your new url is: <a href="http://pin.esy.es/<?php echo $new_url; ?>">www.pin.esy.es/<?php echo $new_url; ?></a></p>
			</div>
		<?php endif; ?>
