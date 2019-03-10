const registerBlockType = wp.blocks.registerBlockType;
const RichText = wp.editor.RichText;
const BlockControls = wp.editor.BlockControls;
const AlignmentToolbar = wp.editor.AlignmentToolbar;

registerBlockType( 'plugin/alignment', {
    title: 'Richtext with Alignment',
    icon: 'universal-access-alt',
    category: 'common',

    attributes: {
        text: {
            selector: '.text',
            source: 'html'
        },
        alignment: {
            type: 'string'
        }
    },

    edit: function( props ) {

        const onChangeContent = ( content ) => {
            props.setAttributes( {
                text: content,
            } );
        };

        const onChangeAlignment = ( alignment ) => {
            props.setAttributes( {
                alignment: alignment
            } );
        };

        return <div>
            <BlockControls>
                <AlignmentToolbar
                    value={ props.attributes.alignment }
                    onChange={ onChangeAlignment }
                />
            </BlockControls>
            <RichText
                tagName="div"
                className={ props.className }
                onChange={ onChangeContent }
                style={ { textAlign: props.attributes.alignment } }
                value={ props.attributes.text }
            />
        </div>;
    },

    save: function( props ) {
        return <div className={ props.className }>
            <RichText.Content
                tagName="div"
                className="text"
                style={ { textAlign: props.attributes.alignment } }
                value={props.attributes.text}
            />
        </div>;
    },
} );