import React from 'react';
import { Menu, type MenuProps } from "@components/navigation/Menu"

/**
 * Makes the menu component accessable via symfony-ux.
 */
export default (props: MenuProps) => {
    return <Menu {...props} />;
}