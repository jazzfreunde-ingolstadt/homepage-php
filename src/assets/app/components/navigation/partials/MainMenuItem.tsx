import React from 'react';

export interface MainMenuItemProps {
    label: string;
    url: string;
}

export default (props: MainMenuItemProps) => {
    return (
        <li role="menuitem" className="m-5">
            <a  className="hover:text-yellow font-bold duration-300" href={props.url}>
                {props.label.toLocaleUpperCase()}
            </a>
        </li>
    )
}