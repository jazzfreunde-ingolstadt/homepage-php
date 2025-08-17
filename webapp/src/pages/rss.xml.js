import rss from '@astrojs/rss';
import { getCollection } from 'astro:content';
import { SITE_TITLE, SITE_DESCRIPTION } from 'src/consts';

export async function GET(context) {
	const events = await getCollection('events');
	return rss({
		title: SITE_TITLE,
		description: SITE_DESCRIPTION,
		site: context.site,
		items: events.map((event) => ({
			...event.data,
			pubDate: new Date(event.data.date).toUTCString(),
			link: `/events/${event.slug}/`,
		})),
	});
}
