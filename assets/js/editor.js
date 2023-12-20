/* eslint-disable indent */
/* eslint-disable no-undef */
wp.domReady(() => {
    wp.blocks.registerBlockStyle('core/list', [
        {
            name: 'default',
            label: 'Default',
            isDefault: true,
        },
        {
            name: 'separator-list',
            label: 'Separador',
        },
        {
            name: 'numbers-list',
            label: 'Números',
        },
        {
            name: 'arrow-list',
            label: 'Flecha simple',
        },
    ]);
    wp.blocks.registerBlockStyle('core/cover', [
        {
            name: 'default',
            label: 'Default',
            isDefault: true,
        },
        {
            name: 'cover-img-contain',
            label: 'Image contain',
        },
    ]);
    wp.blocks.registerBlockStyle('core/columns', [
        {
            name: 'default',
            label: 'Default',
            isDefault: true,
        },
        {
            name: 'no-gap',
            label: 'Sin márgenes',
        },

        {
            name: 'alignfull-left',
            label: 'Aling full left',
        },

        {
            name: 'alignfull-right',
            label: 'Aling full right',
        },

    ]);
    wp.blocks.registerBlockStyle('core/button', [
        {
            name: 'with-arrow',
            label: 'Con Flecha',
        },
    ]);
    wp.blocks.registerBlockStyle('core/paragraph', [
        {
            name: 'default',
            label: 'Default',
            isDefault: true,
        },
        {
            name: 'title-has-image',
            label: 'Imagen integrada',
        },
    ]);

    wp.blocks.registerBlockStyle('core/table', [
        {
            name: 'color-table',
            label: 'Color Table',
        },
    ]);

    wp.blocks.registerBlockStyle('core/group', [
        {
            name: 'border-radius',
            label: 'Border redondeados',
        },

        {
            name: 'card',
            label: 'Card',
        },

        {
            name: 'card-horizontal',
            label: 'Card Horizontal',
        },

        {
            name: 'alignwide-small',
            label: 'Ancho reducido',
        },
    ]);
});

/* ADD data space height to wp-block-spacer in Gutenberg */
wp.data.subscribe(function () {
    setTimeout(function () {
        const spacerBlocks = document.querySelectorAll('.wp-block.wp-block-spacer');

        for (let item = 0; item < spacerBlocks.length; item++) {
            const block = spacerBlocks[item];

            const style = getComputedStyle(block),
                height = parseInt(style.height) || 0;

            block.querySelector('.components-resizable-box__container').setAttribute('data-spaceheight', height + 'px');
        }
    }, 1);
});



