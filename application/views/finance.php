<div id="template_content_title">
	Your finance information.
</div>
<div id="template_content_container">
	<div id="finance_form_container">
		<div class="errors">
			<?php if (isset($general_error)) {
				echo $general_error;
			   }
		   echo validation_errors('<p>');
		?>
		</div>
		<div class="success">
			<?php if (isset($success_msg)) {
				echo $success_msg;
			   }
			?>
		</div>
	</div>

	<?php

		// page/finance is the controller, changefinance is the function
		$form = array(
			'class' => 'form',
			'id' => 'changefinance'
			);
		$currentlySaved = array(
              'name'        => 'currentlySaved',
              'id'          => 'currentlySaved',
			  'type'		=> 'text',
              'value'       => set_value('currentlySaved',$user_settings['userCurrentlySaved']),
              'maxlength'   => '10',
              'size'        => '75'
            );	
		$interestOnSavings = array(
              'name'        => 'interestOnSavings',
              'id'          => 'interestOnSavings',
			  'type'		=> 'text',
              'value'       => set_value('interestOnSavings',$user_settings['userInterestOnSavings']),
              'maxlength'   => '10',
              'size'        => '75'
            );	
		$monthlyIncome = array(
              'name'        => 'monthlyIncome',
              'id'          => 'monthlyIncome',
			  'type'		=> 'text',
              'value'       => set_value('monthlyIncome',$user_settings['userMonthlyIncome']),
              'maxlength'   => '10',
              'size'        => '75'
            );	
		$transactionType = 'transactionType';
		$transactionType_options = Array(
			'expenses' => 'Add/Remove Money From The Savings Account',
			'income' => 'Add Money To A Goal');
			
		$transactionGoal = 'transactionGoal';
		if(empty($goals_array))
		{
			$transactionGoal_options = Array('empty' => 'No Goals');
		}
		else
		{
			foreach ($goals_array as $goal)
			{
				$transactionGoal_options[$goal['goalID']] = $goal['goalName'];
			}
		}
		$transactionAmount = array(
              'name'        => 'transactionAmount',
              'id'          => 'transactionAmount',
			  'type'		=> 'text',
              'maxlength'   => '10',
              'size'        => '20'
            );	
		$submit_finance = array(
				'name' => 'submit_finance',
    			'id' => 'submit_finance',
    			'value' => 'Submit',
    			'type' => 'submit',
    			'content' => 'Submit'
			);
		$submit_add_finance = array(
				'name' => 'submit_add_finance',
    			'id' => 'submit_add_finance',
    			'value' => 'Submit',
    			'type' => 'submit',
    			'content' => 'Add'
			);
			echo form_open(base_url().'page/changefinance', $form);
	?>
	<div id="finance_title" style="margin: 25px 0px 15px 0px;">
		<span style="font-size: 20px; font-weight: 300;">Account finances</span>
	</div>
	<div id="finance_form_container">
		
		<div class="financeinput left">
			<label for="change_currentlySaved">Currently Saved</label><br>
			<?php echo form_input($currentlySaved); ?>
		</div>
		<div class="financeinput right">
			<label for="change_interestOnSavings">Interest On Savings</label><br>
			<?php echo form_input($interestOnSavings); ?>
		</div>
		<div class="financeinput left">
			<label for="change_monthlyIncome">Monthly Income</label><br>
			<?php echo form_input($monthlyIncome); ?>
		</div>
		</div>
		<div id="finance_form_container">
			<div class="updateacc_button">
				<?php echo form_button($submit_finance); ?>
			</div>
		</div>
		<div class="financeinput left">
			<label for="change_transactiontype">Transaction Type</label><br>
			<?php echo form_dropdown($transactionType, $transactionType_options); ?>
		</div>

		<div class="financeinput left">
			<label for="change_transactiongoal">Transaction Goal</label><br>
			<?php echo form_dropdown($transactionGoal,  $transactionGoal_options); ?>
		</div>
		<div class="financeinput left">
			<label for="change_monthlyIncome">Monthly Income</label><br>
			<?php echo form_input($transactionAmount); ?>
		</div>
		<div id="finance_form_container">
			<div class="updateacc_button">
				<?php echo form_button($submit_add_finance); ?>
			</div>
		</div>
		
		<div style="clear:both"></div>
	</div>

	<?php echo form_close(); ?>
</div>