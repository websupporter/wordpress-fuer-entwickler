const registerBlockType = wp.blocks.registerBlockType;
const ServerSideRender = wp.components.ServerSideRender;

registerBlockType( 'example/current-time', {
    title: 'Angesehen am',
    icon: 'universal-access-alt',
    category: 'common',

    save: function( props ) {
        return null;
    },

    edit: function( props ) {

        if(props.isSelected) {
            return(
                <input
                    value={props.attributes.format}
                    type="text"
                    onChange={(event) => {
                        props.setAttributes({
                            format: event.target.value
                        });
                    }
                    } />
            )
        }

        return (<ServerSideRender
                block="example/current-time"
                attributes={props.attributes}
            ></ServerSideRender>
        );
    },
} );