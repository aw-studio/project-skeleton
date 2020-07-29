module.exports = {
    theme: {
        //   fontFamily: {
        //     default: ["Calibre", "sans-serif"]
        //   },
        fontSize: {
            sm: ['14px', '22px'],
            base: ['16px', '24px'],
            lg: ['20px', '28px'],
            xl: ['24px', '32px'],
            '2xl': ['30px', '38px'],
            '3xl': ['42px', '48px'],
            '4xl': ['54px', '60px'],
            '5xl': ['68px', '72px'],
        },
        fontWeight: {
            normal: 400,
            semibold: 600,
        },
        colors: {
            black: '#2d2d2d',
            white: '#ffffff',
            grey: '#70859C',
            primary: '#4951f2',
            secondary: '#A0F4AF',
        },
        container: {
            center: true,
            padding: {
                default: '24px',
                md: '48px',
            },
        },
        // screens: {
        //   sm: '640px',
        //   md: '768px',
        //   lg: '1024px',
        //   xl: '1280px',
        // },
        purge: ['./resources/**/*.blade.php', './resources/**/*.vue'],
    },
};
