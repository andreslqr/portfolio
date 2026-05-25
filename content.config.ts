import { defineContentConfig, defineCollection, z } from '@nuxt/content'

const projectCollection = {
  type: 'page' as const,
  source: '**/*.md',
  schema: z.object({
    image: z.string(),
    title: z.string(),
    description: z.string(),
    link: z.string()
  })
}

const postCollection = {
  type: 'page' as const,
  source: '**/*.md',
  schema: z.object({
    title: z.string(),
    image: z.string(),
    description: z.string(),
    tags: z.array(z.string()),
    date: z.date(),
    order: z.number()
  }),
}

export default defineContentConfig({
  collections: {
    esProjects: defineCollection({
      ...projectCollection,
      source: 'projects/es/*.md'
    }),
    enProjects: defineCollection({
      ...projectCollection,
      source: 'projects/en/*.md'
    }),
    esPosts: defineCollection({
      ...postCollection,
      source: {
        include: 'posts/es/*.md',
        prefix: '/'
      }
    }),
  }
})
