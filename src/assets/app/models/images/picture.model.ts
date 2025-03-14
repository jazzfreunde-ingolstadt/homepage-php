/**
 * Model for a html picture.
 */
export type Picture = {
    alt: string;
    src: string;
    sources: {
        srcset: string;
        media: string;
    }[];
};