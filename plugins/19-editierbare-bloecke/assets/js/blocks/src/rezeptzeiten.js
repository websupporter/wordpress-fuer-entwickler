const registerBlockType = wp.blocks.registerBlockType;

registerBlockType( 'rezepte/zeiten', {
    title: 'Rezeptzeiten',
    icon: 'universal-access-alt',
    category: 'common',

    attributes : {
        kochzeit : {
            source: 'text',
            selector: '.kochzeit-value',
            type: 'string'
        },
        arbeitszeit : {
            source: 'text',
            selector: '.arbeitszeit-value',
            type: 'string'
        }
    },

    edit: function( props ) {

        const ChangeKochzeit = (event) => {
            props.setAttributes({
                kochzeit: event.target.value
            });
        };
        const ChangeArbeitszeit = (event) => {
            props.setAttributes({
                arbeitszeit: event.target.value
            });
        };
        return <p className={ props.className }>
        <label className="kochzeit">
            <span>Kochzeit:</span>


        <input
            type="number"
            onChange={ ChangeKochzeit }
            value={props.attributes.kochzeit}
        />
        <span>Min</span>
        </label>
        <label className="arbeitszeit">
            <span>Arbeitszeit:</span>
        <input
            type="number"
            onChange={ ChangeArbeitszeit }
            value={props.attributes.arbeitszeit}
        />
        <span>Min</span>
        </label>
        </p>;
    },

    save: function( props ) {
        return <p className={ props.className }>
        <span className="kochzeit">
            Kochzeit: <span className="kochzeit-value">
            {props.attributes.kochzeit}
        </span> Min.
        </span> <span className="arbeitszeit">
            Arbeitszeit: <span className="arbeitszeit-value">
            {props.attributes.arbeitszeit}
        </span> Min.
        </span>
        </p>;
    },
} );