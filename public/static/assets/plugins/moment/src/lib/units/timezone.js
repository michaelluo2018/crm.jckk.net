import { addFormatToken } from '../format/format';

// FORMATTING

addFormatToken('z',  0, 0, 'zoneAbbr');
addFormatToken('zz', 0, 0, 'zoneName');

// MOMENTS

export function getZoneAbbr () {
    //return this._isUTC ? 'UTC' : 'PRC';
    return  'PRC';
}

export function getZoneName () {
    return this._isUTC ? 'Coordinated Universal Time' : '';
}
