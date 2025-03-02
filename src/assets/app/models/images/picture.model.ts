export type Picture = {
    alt: string;
    src: string;
    sources: {
        srcset: string;
        media: string;
    }[];
};