require('dotenv').config();

const env = process.env;

require('laravel-echo-server').run({
    authHost: env.APP_ENV == 'local' ? 'http://server' : env.APP_URL,
    devMode: env.APP_DEBUG,
    database: 'redis',
    databaseConfig: {
        redis: {
            host: 'redis',
            port: env.REDIS_PORT,
            keyPrefix: ''
        }
    },
    apiOriginAllow: {
        allowCors: true,
        allowOrigin: '*',
        allowMethods: 'GET, POST',
        allowHeaders: 'Origin, Content-Type, X-Auth-Token, X-Requested-With, Accept, Authorization, X-CSRF-TOKEN, X-Socket-Id'
    }
});
