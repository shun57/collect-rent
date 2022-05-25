import React from 'react';
import NavLink from '../resources/js/Components/NavLink';

// More on default export: https://storybook.js.org/docs/react/writing-stories/introduction#default-export
export default {
  title: 'Component/NavLink',
  component: NavLink,
  args: {
    href: 'NavLink',
    children: 'NavLink',
    active: true,
  }
};

// More on component templates: https://storybook.js.org/docs/react/writing-stories/introduction#using-args
const Template = (args) => <NavLink {...args} />;

export const Default = Template.bind({});
