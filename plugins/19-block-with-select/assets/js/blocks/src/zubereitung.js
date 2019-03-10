const registerBlockType = wp.blocks.registerBlockType;
const withSelect = wp.data.withSelect;
const VeganCategoryId = 5;

const VeganSwitch = (props)  => {
    if (props.isVegan) {
        return <span>Vegane Zubereitung</span>
    }
    return <span>Zubereitung</span>;
};

const createHigherOrderComponent = withSelect((select) => {
    const categories = select('core/editor').
    getEditedPostAttribute('categories');
    return {
        isVegan: categories.indexOf(VeganCategoryId) > -1
    };
});
const VeganComponent = createHigherOrderComponent( VeganSwitch );

registerBlockType( 'rezepte/zubereitung', {
    title: 'Zubereitung Überschrift',
    icon: 'universal-access-alt',
    category: 'layout',

    edit:  () => {
        return <h2><VeganComponent /></h2>
    },

    save: function() {
        return null;
    },
} );