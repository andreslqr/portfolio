export default defineI18nConfig(() => ({
  legacy: false,
  locale: 'en',
  messages: {
    en: {
      home: 'home',
      blog: 'blog',
      iam: 'Hello I\'m'
    },
    es: {
      home: 'inicio',
      blog: 'blog',
      iam: 'Hola soy'
    }
  }
}))
  