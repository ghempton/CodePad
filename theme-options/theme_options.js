/* 
Theme options by Jon Raasch

http://jonraasch.com
http://twitter.com/jonraasch
*/

jQuery(document).ready(function($) {
    function reset_form(ev) {
        ev.preventDefault();
        
        var answer = confirm('Are you sure you want to reset the Notepad options?');
        
        if ( answer ) return document.getElementById('reset_form').submit();
        else return false;
    }
    
    $('#theme-opts-reset').click(reset_form);

    function build_button_form() {
        out = '<div class="social-button"><select class="social-select">'
        + '<option value="twitter">Twitter</option>'
        + '<option value="facebook">Facebook</option>'
        + '<option value="flickr">Flickr</option>'
        + '<option value="myspace">MySpace</option>'
        + '<option value="youtube">YouTube</option>'
        + '<option value="email">Email</option>'
        + '<option value="rss">RSS</option>'
        + '<option value="custom">Custom Button</option></select>';
        
        out += '<div class="social-custom-inputs"><label>Title</label><input class="regular-text social-title" type="text" name="social_title[]" value="Twitter" /><label>Image</label><input class="regular-text social-image" type="text" name="social_image[]" value="twitter" /><span class="description">Dimension 32 x 32px</span></div>';
        
        randInt = new Date().getTime();
        
        out += '<div class="social-rss-inputs"><label>URL</label><div class="regular-text"><input class="social-rss-default" type="radio" name="social-fake-radio' + randInt + '" value="0" checked /> Default &nbsp; <input class="social-rss-custom" type="radio" name="social-fake-radio' + randInt + '" /> Custom Feed</div><label>&nbsp;</label><input class="regular-text social-rss-url" type="text" name="social_rss_url[]" value="" disabled /></div>';
        
        out += '<div class="social-url-inputs"><label>URL</label><input class="regular-text social-url" type="text" name="social_url[]" /></div>';
        
        out += '<input class="social-custom" type="hidden" name="social_custom[]" value="0" /><br class="clear" />';
        
        out += '<a href="#" class="social-add-cta">+ Add</a><a href="#" class="social-delete-cta">x Delete</a></div>';
        
        return out;
    }

    $('#notepad-opts select.social-select').live('change', function(ev) {
        var $this = $(this).parent(),
        this_val = ev.target.value,
        $title_input  = $('input.social-title', $this),
        $image_input  = $('input.social-image', $this),
        $url_input    = $('input.social-url', $this).val(''),
        $custom_input = $('input.social-custom', $this);
        
        $this.removeClass('sb-rss sb-custom');
        
        var custom_input = 0,
        image_input = this_val;
        
        switch(this_val) {
            case 'rss' :
                $this.addClass('sb-rss');
                $url_input.val('feed');
                var title_input = 'RSS';
            break;
            
            case 'custom':
                $this.addClass('sb-custom');
                var title_input = '',
                image_input = '',
                custom_input = 1;
            break;
            
            case 'myspace':
                var title_input = 'MySpace';
            break;
            
            case 'youtube':
                var title_input = 'YouTube';
            break;
            
            default :
                var title_input = this_val.substring(0,1).toUpperCase() +
this_val.substring(1);
            break;
        }
        
        $title_input.val(title_input);
        $image_input.val(image_input);
        $custom_input.val(custom_input);
        
        
    });
    
    // add social media button
    $('#notepad-opts a.social-add-cta').live('click', function(ev) {
        ev.preventDefault();
        
        var out = build_button_form();
        
        $(this).parent().after($(out));
    });
    
    // delete social media button
    $('#notepad-opts a.social-delete-cta').live('click', function(ev) {
        ev.preventDefault();
        
        var $panel = $(this).parent();
        
        if ( !$panel.siblings('div.social-button').length ) $panel.before($('<a href="#" class="antisocial-cta">+ Add Social Media Button</a>'));
        
        $panel.remove();
    });
    
    // rss stuff
    $('#notepad-opts input.social-rss-default').live('click', function(ev) {
        $(this).parent().siblings('input.social-rss-url').attr('disabled', true).val('');
    });
    
    $('#notepad-opts input.social-rss-custom').live('click', function(ev) {
        $(this).parent().siblings('input.social-rss-url').attr('disabled', false);
    });
    
    // antisocial link
    $('#notepad-opts .antisocial-cta').live('click', function(ev) {
        ev.preventDefault();
        
        var out = build_button_form();
        
        $(this).after($(out)).remove();
    });
});