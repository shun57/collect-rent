import React from 'react';
import Button from '../../resources/js/Components/Button';

// More on default export: https://storybook.js.org/docs/react/writing-stories/introduction#default-export
export default {
  title: 'Component/Button',
  component: Button,
  args: {
    children: "Button",
    className: "bg-gray-900",
    processing: false
  }
};

// More on component templates: https://storybook.js.org/docs/react/writing-stories/introduction#using-args
const Template = (args) => <Button {...args} />;

export const Default = Template.bind({});

export const Red = Template.bind({});
Red.args = {
  className: "bg-red-600"
}

export const Blue = Template.bind({});
Blue.args = {
  className: "bg-blue-600"
}