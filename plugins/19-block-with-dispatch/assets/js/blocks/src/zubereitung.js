const registerBlockType = wp.blocks.registerBlockType;
const withSelect = wp.data.withSelect;
const withDispatch = wp.data.withDispatch;
const compose = wp.compose.compose;
const VeganCategoryId = 5;

const VeganSwitch = (props)  => {
  var text = 'Zubereitung';
  if (props.isVegan) {
    text = 'Vegane Zubereitung';
  }
  return <span>
      {text}
    <input
      type="checkbox"
      onClick={props.onChange}
      checked={props.isVegan}
    />
    </span>;
};
const createHigherOrderComponent = compose([
    withSelect((select) => {
      const categories = select('core/editor').
      getEditedPostAttribute('categories');
      return {
        isVegan: categories.indexOf(VeganCategoryId) > -1
      };
    }),
    withDispatch((dispatch) => {
      return {
        onChange: () => {
          var list = wp.data.select('core/editor').
          getEditedPostAttribute('categories');
          if( -1 === list.indexOf(VeganCategoryId)) {
            list.push(VeganCategoryId);
          } else {
            list.splice(list.indexOf(VeganCategoryId),1)
          }

          dispatch('core/editor').updatePost({
            categories:list
          });
        }
      };
    }),
  ]
);
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