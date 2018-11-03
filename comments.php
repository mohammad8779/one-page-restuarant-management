<div class="comments">
		<div class="container">
		<div class="row justify-content-md-center ">
		<div class="col-md-10">
		<!--section title-->

		<ul>
			<?php
                wp_list_comments();
			?>
		</ul>

		<div class="section-title text-center">
			<h2>Leave Your Comment</h2>
		</div>
		<!--section title-->
        <?php
           

           $mealp_comment_fields = array();
           $placeholder_traslatable = __('Name','mealpractice');
           $mealp_comment_fields['author'] = <<<EOD
<div class="row">
	<div class=" col-md-6">
		<div class="form-group">
			<input type="text" id="author" name="author"  class="form-control" placeholder="{$placeholder_traslatable }*" required="">
		</div>
	</div>
EOD;
				$mealp_comment_fields['email'] = <<<EOD
	<div class=" col-md-6">
		<div class="form-group ">
			<input type="email" id="email" name="email" class="form-control" placeholder="Email*" required="">
		</div>
	</div>
</div>
EOD;
				$mealp_comment_fields['url'] = <<<EOD
<div class="form-group">
	<div class="controls">
		<input type="text" id="url" name="url" class="form-control" placeholder="Website" required="">
	</div>
</div>
EOD;
				$mealp_comment_field = <<<EOD
<div class="form-group">
	<div class="controls">
        <textarea id="comment" name="comment" rows="1" placeholder="Comments*" class="form-control"
                  required=""></textarea>
	</div>
</div>
EOD;

           $mealp_comment_submit_button = <<<EOD
<div class="text-center mt-md-5">
	<button type="submit" class="btn btn-danger">Send</button>
</div>
EOD;

	  

		   $mealp_comment_form_arguments = array(
                
                'fields'        => $mealp_comment_fields,
                'comment_field' => $mealp_comment_field,
                'submit_button' =>  $mealp_comment_submit_button,
                'class_form'    => 'comments-form text-left',
                'comment_notes_before' => '',
                'comment_notes_after' => '<p>Your email address will not be published. Required fields are marked *</p>',
                'title_reply' => ''
		   );

             comment_form( $mealp_comment_form_arguments);
        ?>
        

     </div>
  </div>
</div>
</div>


