const registerBlockType = wp.blocks.registerBlockType;
const ServerSideRender = wp.components.ServerSideRender;
registerBlockType( 'example/current-time', {
    title: 'Angesehen am',
    icon: 'universal-access-alt',
    category: 'common',
    edit: function( props ) {
        return (<ServerSideRender
                block="example/current-time"
            ></ServerSideRender>
        );
    },
    save: function( props ) {
        return null;
    }
} );