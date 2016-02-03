(function() {
  tinymce.PluginManager.add('sharpspring_button', function( editor, url ) {
    editor.addButton('sharpspring_button', {
      title: "SharpSring Form Tracker",
      icon: 'ss-icon',
      onclick: function() {
        editor.windowManager.open( {
          body: [
            {
              type: 'textbox',
              name: 'tracking_id',
              label: 'Traking ID',
              value: ''
            },
            {
              type: 'textbox',
              name: 'base_uri',
              label: 'Base URI',
              value: ''
            },
            {
              type: 'textbox',
              name: 'endpoint',
              label: 'Endpoint ID',
              value: ''
            },
            {
              type: 'textbox',
              name: 'form_id',
              label: 'Form ID',
              value: ''
            },
          ],
          onsubmit: function( e ) {
            editor.insertContent( '[springsource_form tracking_id="' + e.data.tracking_id + '" base_uri="' + e.data.base_uri + '" endpoint="' + e.data.endpoint + '" form_id="' + e.data.form_id + '" ]');
          }
        });
      }
    });
  });
})();