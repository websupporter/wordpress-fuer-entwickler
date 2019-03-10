const registerBlockType = wp.blocks.registerBlockType;
const RichText = wp.editor.RichText;
const BlockControls = wp.editor.BlockControls;

const Toolbar = wp.components.Toolbar;
const ToolbarButton = wp.components.ToolbarButton;

const icon = <svg
    viewBox="0 0 100 100"
    width="20px" height="20px" xmlns="http://www.w3.org/2000/svg">
    <circle cx="50" cy="50" r="50"/>
</svg>;

registerBlockType( 'plugin/spacing', {
    title: 'Spacing Toolbar',
    icon: 'universal-access-alt',
    category: 'common',

    attributes: {
        text: {
            selector: '.text',
            source: 'html'
        },
        spacing: {
            type: 'boolean',
            default: false
        }
    },

    edit: function( props ) {

        const onChangeContent = ( content ) => {
            props.setAttributes( {
                text: content,
            } );
        };

        const ToggleSpacing = () => {
            props.setAttributes( {
                spacing: ! props.attributes.spacing
            } );
        };

        const style = {
            lineHeight: (props.attributes.spacing)? 1.5 : 1
        };
        return <div>
            <BlockControls>
                <Toolbar>
                    <ToolbarButton
                        title="Spacing"
                        isActive={props.attributes.spacing}
                        onClick={ToggleSpacing}
                        icon={icon}
                    />
                </Toolbar>
            </BlockControls>
            <RichText
                tagName="div"
                className={ props.className }
                onChange={ onChangeContent }
                style={style}
                value={ props.attributes.text }
                isSelected={ props.isSelected }
            />
        </div>;
    },


    save: function( props ) {
        const style = {
            lineHeight: (props.attributes.spacing)? 1.5 : 1
        };

        return <div className={ props.className }>
            <RichText.Content
                tagName="div"
                className="text"
                style={style}
                value={props.attributes.text}
            />
        </div>;
    },

} );