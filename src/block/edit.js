import { useBlockProps } from '@wordpress/block-editor';
import './editor.scss';
import Settings from './settings';
import classNames from 'classnames';

export default function Edit({ attributes, setAttributes, clientId }) {
	const blockProps = useBlockProps({
		className: classNames('custom-breadcrumbs'),
	});
	return (
		<>
			<Settings attributes={attributes} setAttributes={setAttributes} clientId={clientId} />
			<div {...blockProps}>
				<ul className="custom-breadcrumbs-list">
					<li className="custom-breadcrumbs-item">
						<a onClick={(e) => e.preventDefault()} href="#">Home</a>
						<span className="custom-breadcrumbs-separator" dangerouslySetInnerHTML={{ __html: attributes?.isShowIcon && attributes?.svg ? attributes?.svg : "&#92" }} />
					</li>
					<li className="custom-breadcrumbs-item">
						<a onClick={(e) => e.preventDefault()} href="#">Dummy Parent</a>
						<span className="custom-breadcrumbs-separator" dangerouslySetInnerHTML={{ __html: attributes?.isShowIcon && attributes?.svg ? attributes?.svg : "&#92" }} />
					</li>
					<li className="custom-breadcrumbs-item">
						<a onClick={(e) => e.preventDefault()} href="#">Dummy Page</a>
					</li>
				</ul>
			</div>
		</>
	)
}
