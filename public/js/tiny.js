tinymce.init({
    selector: 'textarea.publication',  // change this value according to your HTML
    auto_focus: 'element1',
    branding: false,
    color_picker_callback: function(callback, value) {
        callback('#FF00FF');
      }
    });

  