import React from 'react';
import Checkbox from '../../resources/js/Components/Checkbox';

// More on default export: https://storybook.js.org/docs/react/writing-stories/introduction#default-export
export default {
  title: 'Component/Checkbox',
  component: Checkbox,
  args: {
    type: 'checkbox',
    name: 'checkbox',
    value: true,
    className: "rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
  }
};

// More on component templates: https://storybook.js.org/docs/react/writing-stories/introduction#using-args
const Template = (args) => <Checkbox {...args} />;

export const Default = Template.bind({});
