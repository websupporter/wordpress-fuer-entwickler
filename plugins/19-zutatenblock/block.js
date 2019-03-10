const createElement = wp.element.createElement;
const registerBlockType = wp.blocks.registerBlockType;

registerBlockType( 'rezepte/zutaten', {
    title: 'Zutaten Überschrift',
    icon: 'universal-access-alt',
    category: 'common',

    edit: function(props) {
        return createElement( 'h2', {
            className:props.className
        }, 'Zutaten' );
    },


    save: function(props) {
        return createElement( 'h2', {
            className:props.className
        }, 'Zutaten' );
    },
} );