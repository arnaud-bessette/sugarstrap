<?php /* Smarty version 2.6.11, created on 2012-12-05 16:56:36
         compiled from themes/SugarStrap/tpls/footer.tpl */ ?>
<!--end body panes-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span12" id="bottomLinks">
                <?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
                <?php echo $this->_tpl_vars['BOTTOMLINKS']; ?>

                <?php endif; ?>
            </div>
        </div>
    </section>
    <footer>
        <div class="row">
        	<div class="span6" id="responseTime">
                <span class="stats"><?php echo $this->_tpl_vars['STATISTICS']; ?>
</span>
            </div>
            <div class="span6" id="copyright">
                <span class="by">Built with <a href="http://twitter.github.com/bootstrap/" target="_blank">Twitter Boostrap</a> by Tobias Korsbäck.</span>
            </div>
        </div>
    </footer>

</div>
<script>
<?php echo '
if(SUGAR.util.isTouchScreen()) {
        setTimeout(resizeHeader,10000);
}

//qe_init function sets listeners to click event on elements of \'quickEdit\' class
 if(typeof(DCMenu) !=\'undefined\'){
    DCMenu.qe_refresh = false;
    DCMenu.qe_handle;
 }
function qe_init(){

    //do not process if YUI is undefined
    if(typeof(YUI)==\'undefined\' || typeof(DCMenu) == \'undefined\'){
        return;
    }


    //remove all existing listeners.  This will prevent adding multiple listeners per element and firing multiple events per click
    if(typeof(DCMenu.qe_handle) !=\'undefined\'){
        DCMenu.qe_handle.detach();
    }

    //set listeners on click event, and define function to call
    YUI().use(\'node\', function(Y) {
        var qe = Y.all(\'.quickEdit\');
        var refreshDashletID;
        var refreshListID;

        //store event listener handle for future use, and define function to call on click event
        DCMenu.qe_handle = qe.on(\'click\', function(e) {
            //function will flash message, and retrieve data from element to pass on to DC.miniEditView function
            ajaxStatus.flashStatus(SUGAR.language.get(\'app_strings\', \'LBL_LOADING\'),800);
            e.preventDefault();
            if(typeof(e.currentTarget.getAttribute(\'data-dashlet-id\'))!=\'undefined\'){
                refreshDashletID = e.currentTarget.getAttribute(\'data-dashlet-id\');
            }
            if(typeof(e.currentTarget.getAttribute(\'data-list\'))!=\'undefined\'){
                refreshListID = e.currentTarget.getAttribute(\'data-list\');
            }
            DCMenu.miniEditView(e.currentTarget.getAttribute(\'data-module\'), e.currentTarget.getAttribute(\'data-record\'),refreshListID,refreshDashletID);
        });

    });
}

    qe_init();


	SUGAR_callsInProgress++;
	SUGAR._ajax_hist_loaded = true;
    if(SUGAR.ajaxUI)
    	YAHOO.util.Event.onContentReady(\'ajaxUI-history-field\', SUGAR.ajaxUI.firstLoad);
</script>
'; ?>


</body>
</html>