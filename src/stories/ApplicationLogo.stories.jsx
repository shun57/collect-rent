import React from 'react';
import ApplicationLogo from '../resources/js/Components/ApplicationLogo';

// More on default export: https://storybook.js.org/docs/react/writing-stories/introduction#default-export
export default {
  title: 'Component/ApplicationLogo',
  component: ApplicationLogo,
  args: {
    className: "w-20 h-20 fill-current text-gray-500"
  }
};

// More on component templates: https://storybook.js.org/docs/react/writing-stories/introduction#using-args
const Template = (args) => <ApplicationLogo {...args} />;

export const Default = Template.bind({});
