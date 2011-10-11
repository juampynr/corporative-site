/**
 * @file
 * This file contains most of the code for the configuration page.
 */
 
// Create the drupal ShareThis object for clean code and namespacing:
var drupal_st = {
	// These are handlerd for updating the widget pic class.
	multiW: function() {
		$(".st_widgetPic").addClass("st_multi");
	},
	classicW: function() {
		$(".st_widgetPic").removeClass("st_multi");
	},
	// These are the handlers for updating the button pic class (stbc = sharethisbuttonclass).
	smallChicklet: function () {
		drupal_st.removeButtonClasses();
		$("#stb_sprite").addClass("stbc_");
	},
	largeChicklet: function () {
		drupal_st.removeButtonClasses();
		$("#stb_sprite").addClass("stbc_large");
	},
	hcount: function() {
		drupal_st.removeButtonClasses();
		$("#stb_sprite").addClass("stbc_hcount");
	},
	vcount: function() {
		drupal_st.removeButtonClasses();
		$("#stb_sprite").addClass("stbc_vcount");
	},
	button: function() {
		drupal_st.removeButtonClasses();
		$("#stb_sprite").addClass("stbc_button");
	},
	// This is a helper function for updating button pictures.
	removeButtonClasses: function() {
		var toRemove = $("#stb_sprite");
		toRemove.removeClass("stbc_");
		toRemove.removeClass("stbc_large");
		toRemove.removeClass("stbc_hcount");
		toRemove.removeClass("stbc_vcount");
		toRemove.removeClass("stbc_button");
	},
	//Write helper functions for saving:
	getWidget: function () {
		return $(".st_widgetPic").hasClass("st_multiW") ? '5x': '4x';
	},
	getButtons: function () {
		var selectedButton = 'large';
		var buttonButtons = $(".st_wIm");
		buttonButtons.each(function () {
			if ($(this).hasClass("st_select")) {
				selectedButton = $(this).attr("id").substring(3);
			}
		});
		console.log(selectedButton);
		return selectedButton;
	},
	setupServiceText: function () {
		$("#edit-service-option").css({display:"none"});
	},
	// Function to add various events to our html form elements
	addEvents: function() {
		$("#edit-widget-option-st-multi").click(drupal_st.multiW);
		$("#edit-widget-option-st-direct").click(drupal_st.classicW);
		
		$("#edit-button-option-stbc-").click(drupal_st.smallChicklet);
		$("#edit-button-option-stbc-large").click(drupal_st.largeChicklet);
		$("#edit-button-option-stbc-hcount").click(drupal_st.hcount);
		$("#edit-button-option-stbc-vcount").click(drupal_st.vcount);
		$("#edit-button-option-stbc-button").click(drupal_st.button);
		
		$(".st_formButtonSave").click(drupal_st.updateOptions);
	},
	serviceCallback: function() {
		var services = stlib_picker.getServices("myPicker");
		var outputString = "";
		for(i=0;i<services.length;i++) {
			outputString += "\"" + _all_services[services[i]].title + ":"
			outputString += services[i] + "\","
		}
		outputString = outputString.substring(0, outputString.length-1);
		$("#edit-service-option").attr("value", outputString);
	}
};
//After the page is loaded, we want to add events to dynamically created elements.
$(document).ready(drupal_st.addEvents);
//After it's all done, hide the text field for the service picker so that no one messes up the data.
$(document).ready(drupal_st.setupServiceText);