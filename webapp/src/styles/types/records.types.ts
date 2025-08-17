export type RecordEntries<T> = {
	[K in keyof T]: [K, T[K]];
  }[keyof T][];