<?php /* Designed and developed by Gilbert Karogo K., a product of umatidocs.com */  

if($objects=="show_login"){

	$url=mvc_public_url(array('controller' => "calculatorwp_clientloans" , 'action' => 'index'));
	
	echo calculatorwp_class('calculatorwp_account')->user_gate($url);

}
elseif($objects=='sl_client_account_not_created'){

	?>
	<div class="client_dash">
		<h3><center>Your account not a mortgage client account, please contact us and we will resolve this.</center></h3>
	</div>
	<?php /* Designed and developed by Gilbert Karogo K., a product of umatidocs.com */  

}
else{

?>
    <div class="client_dash">
        
        <div id="calculatorwp_dash_content">
                <div class="logout_link_wrapper">
                    <div id="calculatorwp_dash_menu"></div>
                    <?php do_action('calculatorwp_borrower_top_menu'); ?>
                </div>
                <br><br>
                <div></div>
        <div class = "wrap calculatorwp_input" id="calculatorwp_loan_dash">
            <center>
                <span class="calculatorwp_main_title_message">
                    Ticket No: <b><?php echo esc_html($ticket['number']);?> </b>
                    | Mortgage Application ID: 
                    <b><?php
                        echo esc_html($ticket['loan_id']);
                    ?></b>
                    | Status: 
                    <b><?php
                        $sl_message_status=array(
                                        1=>'Open',
                                        2=>'Resolved'
                                    );
                        echo esc_html($sl_message_status[$ticket['status']]);

                    ?></b>
                </span>

            </center>
            
            <table class="calculatorwp_list_table">
            
            <?php /* Designed and developed by Gilbert Karogo K., a product of umatidocs.com */   

            $username_display = mvc_model('calculatorwpClientaccount')->find_one(['conditions'=>['wp_user_id'=>get_current_user_id()]])->firstname;

            foreach ($objects as $object): ?>

                <?php /* Designed and developed by Gilbert Karogo K., a product of umatidocs.com */   $this->render_view('message_item', array('locals' => array('object' => $object,'username_display'=>$username_display))); ?>

            <?php /* Designed and developed by Gilbert Karogo K., a product of umatidocs.com */   endforeach; ?>
            
            <td class="sl_list_single_message">
                <?php /* Designed and developed by Gilbert Karogo K., a product of umatidocs.com */
                    echo '<textarea id="calculatorwpMessageInputarea" name="calculatorwpMessageInputarea" class="calculatorwp_textare_input_feild"></textarea>';
                    echo '<br><center><button id="calculatorwpMessageSubmitButton" name="calculatorwpMessageSubmitButton" class="calculatorwpMessageSubmitButton"> Send >> </button></center>';
                ?>
            </td>
            </table>
            <center><?php // echo paginate_links($pagination); ?></center>

            <?php /* Designed and developed by Gilbert Karogo K., a product of umatidocs.com */
                do_action("calculatorwp_build_by");
            ?>  

        </div>
        <script type="text/javascript">
            calculatorwp_ticket_id  = <?php echo esc_html($ticket['id']); ?>;
            calculatorwp_user_id    = <?php echo esc_html(mvc_model('calculatorwpClientaccount')->find_one(['conditions'=>['wp_user_id'=>get_current_user_id()]])->id); ?>;
        </script>
    </div>
<?php } ?>
</div>
</div>
