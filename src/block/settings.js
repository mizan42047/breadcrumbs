import {
    PanelBody,
    TextareaControl,
    ToggleControl
} from '@wordpress/components';
import { memo } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import { InspectorControls } from '@wordpress/block-editor';

const Settings = ({ attributes, setAttributes, clientId }) => {
    const {
        isShowIcon,
        svg,
    } = attributes;
    return (
        <InspectorControls>
            <PanelBody title={'Button Settings'} initialOpen={true}>
                <ToggleControl
                    label="Show Custom Icon"
                    checked={isShowIcon}
                    onChange={(value) => setAttributes({ isShowIcon: value })}
                />
                {
                    isShowIcon && (
                        <TextareaControl
                            help="Paste Your Svg here"
                            label="Custom Breadcrumb Icon"
                            onChange={(value) => {
                                let trimedValue = value.trim();
                                setAttributes({ svg: trimedValue });
                            }}
                            value={svg}
                        />
                    )
                }
            </PanelBody>
        </InspectorControls>
    )
}

export default memo(Settings);