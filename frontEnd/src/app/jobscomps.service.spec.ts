import { TestBed } from '@angular/core/testing';

import { JobscompsService } from './jobscomps.service';

describe('JobscompsService', () => {
  let service: JobscompsService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(JobscompsService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
