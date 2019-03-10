const registerBlockType = wp.blocks.registerBlockType;
const MediaUpload = wp.editor.MediaUpload;
registerBlockType( 'plugin/mediapuload', {
    title: 'Mediaupload Beispiel',
    icon: 'universal-access-alt',
    category: 'common',
    attributes : {
        url : {
            selector: 'img',
            source: 'attribute',
            attribute: 'src'
        },
        id : {
            selector: 'img',
            source: 'attribute',
            attribute: 'id'
        },
        alt : {
            selector: 'img',
            source: 'attribute',
            attribute: 'alt'
        }
    },
    edit: function( props ) {
        const hasImage = () => {
            const remove = () => {

                props.setAttributes({
                    id:null,
                    url:null,
                    alt:null
                });
            };
            return <div className={ props.className }>

                <img
                    src={props.attributes.url}
                    alt={props.attributes.alt}
                    id={props.attributes.id}
                />
                <button onClick={remove}>Remove</button>
            </div>;
        };
        const hasNoImage = () => {

            const onSelectImage = (img) => {
                props.setAttributes( {
                    id: img.id,
                    url: img.url,
                    alt: img.alt
                } );
            };

            return <div className={ props.className }>
                <MediaUpload
                    onSelect={onSelectImage}
                    allowedTypes={['image']}
                    multiple={false}
                    value={ props.attributes.id }
                    render={ ( { open } ) => (
                        <button onClick={ open }>
                            Open Media Library
                        </button>
                    ) }
                />
            </div>;
        };

        return (props.attributes.id) ? hasImage() : hasNoImage();
    },

    save: function( props ) {
        return <div className={ props.className }>
            <img
                src={ props.attributes.url }
                alt={ props.attributes.alt }
                id={ props.attributes.id }
            />
        </div>;
    },
} );