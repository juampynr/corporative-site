/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
window.CKEDITOR_BASEPATH = Drupal.settings.ckeditor.editor_path;
(function ($) {
    Drupal.ckeditor = (typeof(CKEDITOR) != 'undefined');

    Drupal.ckeditorToggle = function(textarea_ids, TextTextarea, TextRTE){
        if (!CKEDITOR.env.isCompatible) {
            return;
        }

        for (i=0; i<textarea_ids.length; i++){
            if (typeof(CKEDITOR.instances) != 'undefined' && typeof(CKEDITOR.instances[textarea_ids[i]]) != 'undefined'){
                Drupal.ckeditorOff(textarea_ids[i]);
                $('#switch_' + textarea_ids[0]).text(TextRTE);
            }
            else {
                Drupal.ckeditorOn(textarea_ids[i]);
                $('#switch_' + textarea_ids[0]).text(TextTextarea);
            }
        }
    };

    /**
 * CKEditor starting function
 *
 * @param string textarea_id
 */
    Drupal.ckeditorOn = function(textarea_id, run_filter) {

        run_filter = typeof(run_filter) != 'undefined' ? run_filter : true;

        if ((typeof(Drupal.settings.ckeditor.load_timeout) == 'undefined') && (typeof(CKEDITOR.instances[textarea_id]) != 'undefined')) {
            return;
        }
        if (typeof(Drupal.settings.ckeditor.elements[textarea_id]) == 'undefined') {
            return;
        }
        var ckeditor_obj = Drupal.settings.ckeditor;

        if (!CKEDITOR.env.isCompatible) {
            return;
        }

        if (run_filter && ($("#" + textarea_id).val().length > 0) && (($("#" + textarea_id).attr('class').indexOf("filterxss1") != -1 && typeof(Drupal.settings.ckeditor.autostart) != 'undefined' && typeof(Drupal.settings.ckeditor.autostart[textarea_id]) != 'undefined') || $("#" + textarea_id).attr('class').indexOf("filterxss2") != -1) && ckeditor_obj.input_formats[ckeditor_obj.elements[textarea_id]].filters.length > 0) {
            $.ajax({
                type: 'POST',
                url: Drupal.settings.basePath + 'index.php?q=ckeditor/xss',
                async: false,
                data: {
                    text: $('#' + textarea_id).val(),
                    input_format: ckeditor_obj.elements[textarea_id],
                    'filters[]': ckeditor_obj.input_formats[ckeditor_obj.elements[textarea_id]].filters
                },
                success: function(text){
                    $("#" + textarea_id).val(text);
                }
            })
        }

        $("#" + textarea_id).next(".grippie").css("display", "none");
        $("#" + textarea_id).addClass("ckeditor-processed");

        var textarea_settings = false;
        ckeditor_obj.input_formats[ckeditor_obj.elements[textarea_id]].toolbar = eval(ckeditor_obj.input_formats[ckeditor_obj.elements[textarea_id]].toolbar);
        textarea_settings = ckeditor_obj.input_formats[ckeditor_obj.elements[textarea_id]];

        textarea_settings['on'] =
        {
            configLoaded  : function(ev)
            {
                ev.editor.addCss(ev.editor.config.extraCss);
            },
            instanceReady : function(ev)
            {
                var body = $(ev.editor.document.$.body);

                if (typeof(ckeditor_obj.input_formats[ckeditor_obj.elements[textarea_id]].custom_formatting) != 'undefined') {
                    var dtd = CKEDITOR.dtd;
                    for ( var e in CKEDITOR.tools.extend( {}, dtd.$block, dtd.$listItem, dtd.$tableContent ) ) {
                        ev.editor.dataProcessor.writer.setRules( e, ckeditor_obj.input_formats[ckeditor_obj.elements[textarea_id]].custom_formatting);
                    }
                    ev.editor.dataProcessor.writer.setRules( 'pre',
                    {
                        indent: ckeditor_obj.input_formats[ckeditor_obj.elements[textarea_id]].output_pre_indent
                    });
                }

                if (ev.editor.config.bodyClass)
                    body.addClass(ev.editor.config.bodyClass);
                if (ev.editor.config.bodyId)
                    body.attr('id', ev.editor.config.bodyId);
                if (typeof(Drupal.smileysAttach) != 'undefined')
                    ev.editor.dataProcessor.writer.indentationChars = '    ';
            },
            focus : function(ev)
            {
                Drupal.ckeditorInstance = ev.editor;
            }
        };

        textarea_settings.extraPlugins = '';
        if (typeof CKEDITOR.plugins != 'undefined'){
            for (var plugin in textarea_settings['loadPlugins']){
                textarea_settings.extraPlugins += (textarea_settings.extraPlugins) ? ',' + textarea_settings['loadPlugins'][plugin]['name'] : textarea_settings['loadPlugins'][plugin]['name'];
                CKEDITOR.plugins.addExternal(textarea_settings['loadPlugins'][plugin]['name'], textarea_settings['loadPlugins'][plugin]['path']);
            }
        }
        Drupal.ckeditorInstance = CKEDITOR.replace(textarea_id, textarea_settings);
    };

    /**
 * CKEditor destroy function
 *
 * @param string textarea_id
 */
    Drupal.ckeditorOff = function(textarea_id) {
        if (typeof(CKEDITOR.instances[textarea_id]) == 'undefined') {
            return;
        }
        if (!CKEDITOR.env.isCompatible) {
            return;
        }
        if (Drupal.ckeditorInstance && Drupal.ckeditorInstance.name == textarea_id)
            delete Drupal.ckeditorInstance;

        $("#" + textarea_id).val(CKEDITOR.instances[textarea_id].getData());
        CKEDITOR.instances[textarea_id].destroy(true);

        $("#" + textarea_id).next(".grippie").css("display", "block");
    };

    /**
 * CKEditor popup mode function
 */
    Drupal.ckeditorOpenPopup = function (jsID, textareaID, width){
        var popupUrl = Drupal.settings.ckeditor.module_path + '/includes/ckeditor.popup.html?var=' + jsID + '&el=' + textareaID;

        var percentPos = width.indexOf('%');
        if (percentPos != -1) {
            width = width.substr(0, percentPos);
            width = width / 100 * screen.width;
        }
        window.open(popupUrl, null, 'width=' + width + ',toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=1,dependent=yes');
        return false;
    };

    /**
 * Returns true if CKEDITOR.version >= version
 */
    Drupal.ckeditorCompareVersion = function (version){
        var ckver = CKEDITOR.version;
        ckver = ckver.match(/(([\d]\.)+[\d]+)/i);
        version = version.match(/((\d+\.)+[\d]+)/i);
        ckver = ckver[0].split('.');
        version = version[0].split('.');
        for (var x in ckver) {
            if (ckver[x]<version[x]) {
                return false;
            }
            else if (ckver[x]>version[x]) {
                return true;
            }
        }
        return true;
    };

    Drupal.ckeditorInsertHtml = function(html) {
        if (!Drupal.ckeditorInstance)
            return false;

        if (Drupal.ckeditorInstance.mode == 'wysiwyg') {
            Drupal.ckeditorInstance.insertHtml(html);
            return true;
        }
        else {
            alert(Drupal.t('Content can be only inserted into CKEditor in WYSIWYG mode.'));
            return false;
        }
    };

    /**
 * Ajax support
 */
    if (typeof(Drupal.Ajax) != 'undefined' && typeof(Drupal.Ajax.plugins) != 'undefined') {
        Drupal.Ajax.plugins.CKEditor = function(hook, args) {
            if (hook === 'submit' && typeof(CKEDITOR.instances) != 'undefined') {
                for (var i in CKEDITOR.instances)
                    CKEDITOR.instances[i].updateElement();
            }
            return true;
        };
    }

    //Support for Panels [#679976]
    Drupal.ckeditorSubmitAjaxForm = function () {
        if (typeof(CKEDITOR.instances) != 'undefined' && typeof(CKEDITOR.instances['edit-body']) != 'undefined') {
            Drupal.ckeditorOff('edit-body');
        }
    };

    /**
 * Drupal behaviors
 */
    Drupal.behaviors.ckeditor = {
        attach:
        function (context) {
            if ((typeof(CKEDITOR) == 'undefined') || !CKEDITOR.env.isCompatible) {
                return;
            }
            $('.ckeditor_links').show();
            // make sure the textarea behavior is run first, to get a correctly sized grippie
            if (Drupal.behaviors.textarea && Drupal.behaviors.textarea.attach) {
                Drupal.behaviors.textarea.attach(context);
            }

            $(context).find("textarea.ckeditor-mod:not(.ckeditor-processed)").each(function () {
                var ta_id=$(this).attr("id");
                if (CKEDITOR.instances && typeof(CKEDITOR.instances[ta_id]) != 'undefined'){
                    Drupal.ckeditorOff(ta_id);
                }
                if ((typeof(Drupal.settings.ckeditor.autostart) != 'undefined') && (typeof(Drupal.settings.ckeditor.autostart[ta_id]) != 'undefined')) {
                    Drupal.ckeditorOn(ta_id);
                }
                var sel_format = ta_id.substr(0, ta_id.lastIndexOf("-")) + "-format--2";
                $('#'+sel_format).change(function(){
                    Drupal.settings.ckeditor.elements[ta_id] = $(this).val();
                    if (CKEDITOR.instances[ta_id])
                        $('#'+ta_id).val(CKEDITOR.instances[ta_id].getData());
                    Drupal.ckeditorOff(ta_id);
                    if (typeof(Drupal.settings.ckeditor.input_formats[$(this).val()]) != 'undefined'){
                        Drupal.ckeditorOn(ta_id, false);
                        $('#switch_'+ta_id).show();
                    }
                    else {
                        $('#switch_'+ta_id).hide();
                    }
                });
            });
        },
        detach:
        function(context){
            $(context).find("textarea.ckeditor-mod.ckeditor-processed").each(function () {
                var ta_id=$(this).attr("id");
                if (CKEDITOR.instances[ta_id])
                    $('#'+ta_id).val(CKEDITOR.instances[ta_id].getData());
                Drupal.ckeditorOff(ta_id);
            }).removeClass('ckeditor-processed');
        }
    };
})(jQuery);

/**
 * IMCE support
 */
var ckeditor_imceSendTo = function (file, win){
    var cfunc = win.location.href.split('&');

    for (var x in cfunc) {
        if (cfunc[x].match(/^CKEditorFuncNum=\d+$/)) {
            cfunc = cfunc[x].split('=');
            break;
        }
    }
    CKEDITOR.tools.callFunction(cfunc[1], file.url);
    win.close();
}
