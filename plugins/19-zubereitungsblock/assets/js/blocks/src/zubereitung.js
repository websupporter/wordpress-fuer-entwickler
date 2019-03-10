const registerBlockType = wp.blocks.registerBlockType;

registerBlockType( 'rezepte/zubereitung', {
    title: 'Zubereitung Überschrift',
    icon: 'universal-access-alt',
    category: 'common',

    edit: function(props) {
        return <h2 className={ props.className }>Zubereitung</h2>;
    },

    save: function(props) {
        return <h2 className={ props.className }>Zubereitung</h2>;
    }
} );