
	function LGMediaInsert()
	{
		var Input = jQuery( '#LightGallery-MetaBox #LightGallery-Images' );
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
			multiple: 'add',
			library:
			{
				type: 'image'
			}
		})
		.on( 'open', function()
		{
			var Selection = Frame.state().get( 'selection' );
			var AttachmentIds = Input.val().split( ',' );

			AttachmentIds.forEach( function( Id )
			{
				var Attachment = wp.media.attachment( Id );

				Attachment.fetch();

				Selection.add( Attachment ? [ Attachment ] : [] );
			});
		})
		.on( 'select', function()
		{
			var Selection = Frame.state().get( 'selection' );

			Input.val( _.compact( Selection.pluck( 'id' ) ) ).change();

			jQuery( '#LightGallery-MetaBox #LightGallery-Preview' ).empty();

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
					jQuery( '#LightGallery-MetaBox #LightGallery-Preview' ).append( '<img src="' + URL + '" alt="" style="height: 50px; margin: 0 10px 10px 0;">' );
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

		$( '#LightGallery-MetaBox .media-gallery' ).click( function( e )
		{
			e.preventDefault();

			LGMediaInsert();
		});

		$( '#Category-MetaBox #selectCategory, #Category-MetaBox #selectStyle' ).change( function()
		{
			var category = $( '#Category-MetaBox #selectCategory' ).val();
			if ( category )
			{
				var style = $('#selectStyle').val();
				var number = 3;
				if (style == 1) {
					number = 9;
				}
				$( '#Category-MetaBox #categortShortCode' ).val( '[categoryGallery category="' + category + '"  style="' + style + '" number="' + number + '"]' );
			}
			else
			{
				$( '#Category-MetaBox #categortShortCode' ).val( '' );
			}
		});


		$( '#insertCategory' ).click( function( e )
		{
			e.preventDefault();

			if ( $( '#categortShortCode' ).val() )
			{
				if ( tinyMCE && tinyMCE.activeEditor )
				{
					tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, $( '#categortShortCode' ).val() );
				}
				else
				{
					var Elm = $( 'textarea#content' );

					Elm.val( Elm.val().substring( 0, Elm.prop( 'selectionStart' ) ) + $( '#categortShortCode' ).val() + Elm.val().substring( Elm.prop( 'selectionEnd' ), Elm.val().length ) );
				}
			}
		});

		$( '#selectSlider, #selectSliderType' ).change( function( e )
		{
			e.preventDefault();
			var value = $('#selectSlider').val();
			if (value) {
				$( '#slider-ShortCode' ).val( '[slider id="' + $( '#selectSlider' ).val() + '" type="' + $('#selectSliderType').val() + '" title="' + $('select#selectSlider  option:selected').text() + '"]' );
			} else {
				$( '#slider-ShortCode' ).val('');
			}

		});
		$( '#insertSlider' ).click( function( e )
		{
			e.preventDefault();

			if ( $( '#slider-ShortCode' ).val() )
			{
				if ( tinyMCE && tinyMCE.activeEditor )
				{
					tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, $( '#slider-ShortCode' ).val() );
				}
				else
				{
					var Elm = $( 'textarea#content' );

					Elm.val( Elm.val().substring( 0, Elm.prop( 'selectionStart' ) ) + $( '#slider-ShortCode' ).val() + Elm.val().substring( Elm.prop( 'selectionEnd' ), Elm.val().length ) );
				}
			}
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
