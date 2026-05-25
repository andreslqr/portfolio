export function useChunk<T>(items: T[] | null | undefined, size: number): T[][] {
  if (!items?.length || size < 1) {
    return []
  }

  const chunks: T[][] = []
  for (let i = 0; i < items.length; i += size) {
    chunks.push(items.slice(i, i + size))
  }
  return chunks
}
