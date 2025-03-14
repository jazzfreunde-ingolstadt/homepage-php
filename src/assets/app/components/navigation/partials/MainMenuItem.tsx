import React from 'react';

export interface MainMenuItemProps {
    /**
     * The label of the menu item.
     */
    label: string;
    /**
     * The URL of the menu item.
     */
    url: string;
}

/**
 * An item in the main menu.
 */
export default (props: MainMenuItemProps) => {
    return (
        <li role="menuitem" className="m-5">
            <a  className="hover:text-yellow font-bold duration-300" href={props.url}>
                {props.label.toLocaleUpperCase()}
            </a>
        </li>
    )
}