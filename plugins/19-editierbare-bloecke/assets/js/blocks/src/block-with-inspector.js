const registerBlockType = wp.blocks.registerBlockType;
const Panel = wp.components.Panel;
const PanelRow = wp.components.PanelRow;
const PanelBody  = wp.components.PanelBody;
const InspectorControls = wp.editor.InspectorControls;
const RichText = wp.editor.RichText;

registerBlockType( 'plugin/blockwithinspector', {
    title: 'Block mit Inspektor',
    icon: 'universal-access-alt',
    category: 'common',
    attributes : {
        text: {
            selector: 'p',
            source: 'html'
        },
        lineHeight : {
            type: 'string',
            source: 'attribute',
            selector: '.text',
            attribute: 'data-lineHeight',
            default:'1'
        },
    },
    edit: function( props ) {

        const onChangeLineHeight = (event) =>
        {
            props.setAttributes( {
                lineHeight: event.target.value,
            } );
        };

        const onChangeContent = ( content ) => {
            props.setAttributes( {
                text: content,
            } );
        };

        const style = {
            lineHeight: props.attributes.lineHeight
        };
        return (
            <div>
                <InspectorControls>
                    <PanelBody title="Line Height">
                        <PanelRow>
                            <input
                                type="number"
                                onChange={onChangeLineHeight}
                                value={props.attributes.lineHeight}
                                step="0.01"
                                min="0.01"
                            />
                        </PanelRow>
                    </PanelBody>
                </InspectorControls>
                <RichText
                    style={ style }
                    value={ props.attributes.text }
                    onChange={ onChangeContent }
                />
            </div>
        )
    },

    save: function( props ) {

        const style = {
            lineHeight: props.attributes.lineHeight
        };
        return <div className={ props.className }>
            <RichText.Content
                style={ style }
                tagName="p"
                className="text"
                data-lineHeight={props.attributes.lineHeight}
                value={props.attributes.text}
            />
        </div>;
    },
} );