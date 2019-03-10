const registerBlockType = wp.blocks.registerBlockType;
const RichText = wp.editor.RichText;
registerBlockType( 'plugin/richtext', {
    title: 'Richtext-Block',
    icon: 'universal-access-alt',
    category: 'common',

    attributes : {
        text : {
            selector: '.text',
            source: 'html'
        }
    },

    edit: function( props ) {

        const onChangeContent = (content) => {
            props.setAttributes({
                text: content
            });
        };
        return <div className={props.className}>
            <RichText
                tagName="div"
                onChange={onChangeContent}
                value={props.attributes.text}
            />
        </div>;
    },

    save: function( props ) {
        return <div className={props.className}>
            <RichText.Content
                tagName="div"
                className="text"
                value={props.attributes.text}
            />
        </div>;
    },
} );