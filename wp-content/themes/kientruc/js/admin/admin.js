/**
 * Created by dinh0 on 10/7/2018.
 */

function LGMediaInsertSlider($item)
{
    var Input = $item.find('input.image');
    var Preview = $item.find('.preview-img');
    console.log(Input,Preview, $item);
    var Frame;

    if ( undefined !== Frame )
    {
        Frame.open();

        return;
    }

    if ( typeof wp.media === 'undefined' )
    {
        return;
    }

    Frame = wp.media
    ({
        frame: 'select',
        //multiple: 'add',
        library:
        {
            type: 'image'
        }
    })
        .on( 'open', function()
        {
            var Selection = Frame.state().get( 'selection' );
            if (Input.val()) {
                var AttachmentIds = Input.val().split( ',' );

                AttachmentIds.forEach( function( Id )
                {
                    var Attachment = wp.media.attachment( Id );

                    Attachment.fetch();

                    Selection.add( Attachment ? [ Attachment ] : [] );
                });
            }

        })
        .on( 'select', function()
        {
            var Selection = Frame.state().get( 'selection' );

            Input.val( _.compact( Selection.pluck( 'id' ) ) ).change();

            Preview.empty();

            _.compact( Selection.pluck( 'sizes' ) ).forEach( function( ImageSize )
            {
                var URL = '';

                if ( ImageSize.thumbnail && ImageSize.thumbnail.url )
                {
                    URL = ImageSize.thumbnail.url;
                }
                else if ( ImageSize.full && ImageSize.full.url )
                {
                    URL = ImageSize.full.url;
                }

                if ( URL )
                {
                    Preview.append( '<img src="' + URL + '" alt="" style="height: 100px;">' );
                }
            });
        });

    Frame.open();
}


jQuery( document ).ready( function( $ )
{
    $( '#LightGallery-MetaBox #LightGallery-Images' ).change( function()
    {
        if ( $( this ).val() )
        {
            $( '#LightGallery-MetaBox #LightGallery-ShortCode' ).val( '[lightgallery images="' + $( this ).val() + '"]' );
        }
        else
        {
            $( '#LightGallery-MetaBox #LightGallery-ShortCode' ).val( '' );
        }
    });



    $( '#LightGallery-MetaBox #LightGallery-ShortCode' ).focus( function()
    {
        if ( $( this ).val() )
        {
            $( this ).select();
        }
    });
    $( document).on('click', '#Slider-MetaBox .remove-image',  function( e )
    {
        e.preventDefault();
        var $item = $(this).closest('.slider-item');
        $item.remove();
    });
    $( document).on('click', '#Slider-MetaBox .select-image',  function( e )
    {
        e.preventDefault();
        var $item = $(this).closest('.slider-item');
        LGMediaInsertSlider($item);
    });
    $( '#Slider-MetaBox button.add-image' ).click( function( e )
    {
        e.preventDefault();
        var lastItem = $('.slider-item').last();
        var newItem = lastItem.clone();
        newItem.find('input.image').val('');
        newItem.find('.preview-img').html('');
        newItem.find('.caption').val('');
        if (!newItem.find('p.header .remove-image').length){
            newItem.find('p.header').append('<span class="remove-image">x</span>');
        }
        newItem.insertAfter(lastItem)
    });

    $( '#LightGallery-MetaBox .media-clear' ).click( function( e )
    {
        e.preventDefault();

        $( '#LightGallery-MetaBox #LightGallery-Preview' ).empty();

        $( '#LightGallery-MetaBox #LightGallery-Images, #LightGallery-MetaBox #LightGallery-ShortCode' ).val( '' );
    });

    $( '#LightGallery-MetaBox .editor-insert' ).click( function( e )
    {
        e.preventDefault();

        if ( $( '#LightGallery-MetaBox #LightGallery-ShortCode' ).val() )
        {
            if ( tinyMCE && tinyMCE.activeEditor )
            {
                tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, $( '#LightGallery-MetaBox #LightGallery-ShortCode' ).val() );
            }
            else
            {
                var Elm = $( 'textarea#content' );

                Elm.val( Elm.val().substring( 0, Elm.prop( 'selectionStart' ) ) + $( '#LightGallery-MetaBox #LightGallery-ShortCode' ).val() + Elm.val().substring( Elm.prop( 'selectionEnd' ), Elm.val().length ) );
            }
        }
    });
});
jQuery(document).ready( function($) {

    jQuery('#banner_image-media').click(function(e) {

        e.preventDefault();
        var image_frame;
        if(image_frame){
            image_frame.open();
        }
        // Define image_frame as wp.media object
        image_frame = wp.media({
            title: 'Select Media',
            multiple : false,
            library : {
                type : 'image',
            }
        });

        image_frame.on('close',function() {
            // On close, get selections and save to the hidden input
            // plus other AJAX stuff to refresh the image preview
            var selection =  image_frame.state().get('selection');
            var gallery_ids = new Array();
            var url = new Array();
            var my_index = 0;
            selection.each(function(attachment) {
                gallery_ids[my_index] = attachment['id'];
                url[my_index] = attachment['attributes']['url'];
                my_index++;
            });
            var ids = gallery_ids.join(",");
            var urls = url.join(",");
            if (ids && urls) {
                jQuery('input#myprefix_image_id').val(ids);
                jQuery('input#image_url').val(urls);
                jQuery('#image_banner').attr('src', urls);

            }
        });

        image_frame.on('open',function() {
            // On open, get the id from the hidden input
            // and select the appropiate images in the media manager
            var selection =  image_frame.state().get('selection');
            ids = jQuery('input#myprefix_image_id').val().split(',');
            ids.forEach(function(id) {
                attachment = wp.media.attachment(id);
                attachment.fetch();
                selection.add( attachment ? [ attachment ] : [] );
            });

        });

        image_frame.open();
    });
    jQuery('#banner_image-media_slider_home').click(function(e) {

        e.preventDefault();
        var image_frame;
        if(image_frame){
            image_frame.open();
        }
        // Define image_frame as wp.media object
        image_frame = wp.media({
            title: 'Select Media',
            multiple : true,
            library : {
                type : 'image',
            }
        });

        image_frame.on('close',function() {
            // On close, get selections and save to the hidden input
            // plus other AJAX stuff to refresh the image preview
            var selection =  image_frame.state().get('selection');
            var gallery_ids = new Array();
            var url = new Array();
            var my_index = 0;
            var html = "";
            selection.each(function(attachment) {
                if (attachment['id']) {
                    gallery_ids[my_index] = attachment['id'];
                    url[my_index] = attachment['attributes']['url'];
                    html += '<img class="redux-option-image" src="' + url[my_index] + '">';
                    my_index++;
                }
                
            });
            var ids = gallery_ids.join(",");
            var urls = url.join(",");
            if (ids && urls) {
                jQuery('input#myprefix_image_id_slider_home').val(ids);
                jQuery('#list_img').html(html);

            }
        });

        image_frame.on('open',function() {
            // On open, get the id from the hidden input
            // and select the appropiate images in the media manager
            var selection =  image_frame.state().get('selection');
            ids = jQuery('input#myprefix_image_id_slider_home').val().split(',');
            console.log(ids);
            ids.forEach(function(id) {
                attachment = wp.media.attachment(id);
                attachment.fetch();
                selection.add( attachment ? [ attachment ] : [] );
            });

        });

        image_frame.open();
    });
    jQuery('#upload-logo-home').click(function(e) {

        e.preventDefault();
        var image_frame;
        if(image_frame){
            image_frame.open();
        }
        // Define image_frame as wp.media object
        image_frame = wp.media({
            title: 'Select Media',
            multiple : false,
            library : {
                type : 'image',
            }
        });

        image_frame.on('close',function() {
            // On close, get selections and save to the hidden input
            // plus other AJAX stuff to refresh the image preview
            var selection =  image_frame.state().get('selection');
            var gallery_ids = new Array();
            var url = new Array();
            var my_index = 0;
            selection.each(function(attachment) {
                gallery_ids[my_index] = attachment['id'];
                url[my_index] = attachment['attributes']['url'];
                my_index++;
            });
            var ids = gallery_ids.join(",");
            var urls = url.join(",");
            if (ids && urls) {
                jQuery('input#logo_id_home').val(ids);
                jQuery('input#logo_img').val(urls);
                jQuery('#logo-preview').attr('src', urls);

            }
        });

        image_frame.on('open',function() {
            // On open, get the id from the hidden input
            // and select the appropiate images in the media manager
            var selection =  image_frame.state().get('selection');
            ids = jQuery('input#logo_id_home').val().split(',');
            ids.forEach(function(id) {
                attachment = wp.media.attachment(id);
                attachment.fetch();
                selection.add( attachment ? [ attachment ] : [] );
            });

        });

        image_frame.open();
    });

});

// Ajax request to refresh the image preview
function Refresh_Image(the_id){
    var data = {
        action: 'myprefix_get_image',
        id: the_id
    };

    jQuery.get(ajaxurl, data, function(response) {

        if(response.success === true) {
            jQuery('#myprefix-preview-image').replaceWith( response.data.image );
        }
    });
}