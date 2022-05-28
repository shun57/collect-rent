import React from 'react';
import ResponsiveNavLink from '../../resources/js/Components/ResponsiveNavLink';

// More on default export: https://storybook.js.org/docs/react/writing-stories/introduction#default-export
export default {
  title: 'Component/ResponsiveNavLink',
  component: ResponsiveNavLink,
  args: {
    href: 'ResponsiveNavLink',
    children: 'ResponsiveNavLink',
    active: true,
    className: 'w-full flex items-start pl-3 pr-4 py-2 border-l-4'
  }
};

// More on component templates: https://storybook.js.org/docs/react/writing-stories/introduction#using-args
const Template = (args) => <ResponsiveNavLink {...args} />;

export const Default = Template.bind({});
