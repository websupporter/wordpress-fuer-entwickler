class DoubleImages {

    constructor() {
        this.message = 'Du verwendest ein Bild doppelt!';
        this.id = 'DOUBLE_IMAGE_WARNING';
    }

    showsNotice() {
        var shows = false;
        const all = wp.data.select('core/notices').getNotices();
        all.forEach( (notice) => {
                if ( notice.id === this.id ) {
                    shows = true;
                }
            }
        );
        return shows;
    }

    removeNotice() {
        if( ! this.showsNotice() ) {
            return;
        }
        wp.data.dispatch('core/notices').removeNotice(this.id);
    }

    exist() {

        const blocks = wp.data.select('core/editor').getBlocks();
        const imageBlocks = blocks.filter( (block) => {
            return block.name === 'core/image';
        });

        const pictureIds = imageBlocks.map( (block) => {
            return block.attributes.id
        });

        const uniqueIds = [];
        pictureIds.forEach( (id) => {
            if( -1 !== uniqueIds.indexOf(id) ) {
                return;
            }
            uniqueIds.push(id);
        });

        return pictureIds.length !== uniqueIds.length;
    }

    subscribe() {
        if( !this.exist() ) {
            this.removeNotice();
            return;
        }

        if( this.showsNotice()) {
            return;
        }
        wp.data.dispatch('core/notices').createWarningNotice(
            this.message,
            {
                id:this.id,
                isDismissible:false
            }
        );
    }
};

const DoubleImagesInstance = new DoubleImages();
wp.data.subscribe(
    () => {
        DoubleImagesInstance.subscribe();
    }
);