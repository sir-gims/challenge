import { render, screen } from '@testing-library/react';
import ClickMe from "./ClickMe";

test('renders ClickMe', () => {
    render(<ClickMe />);
    const linkElement = screen.getByText('+');
    expect(linkElement).toBeInTheDocument();
});
